<template>
  <div>
    <modal-trash-box :is-active="isModalActive" :trash-subject="trashObjectName" @confirm="trashConfirm" @cancel="trashCancel"/>
    <b-table
      :checked-rows.sync="checkedRows"
      :checkable="checkable"
      :loading="isLoading"
      :paginated="paginated"
      :per-page="perPage"
      :striped="true"
      :hoverable="true"
      default-sort="name"
      :data="users">

      <template slot-scope="props">
        <b-table-column label="Nombre" field="name" sortable>
          {{ props.row.name }}
        </b-table-column>
        <b-table-column label="First Name" field="first_name" sortable>
          {{ props.row.first_name }}
        </b-table-column>
        <b-table-column label="Last Name" field="last_name" sortable>
          {{ props.row.last_name }}
        </b-table-column>
        <b-table-column label="Created">
          <small class="has-text-grey is-abbr-like" :title="props.row.created_at">{{ props.row.created_at }}</small>
        </b-table-column>
        <b-table-column custom-key="actions" class="is-actions-cell">
          <div class="buttons is-right">
            <router-link :to="{name:'users.edit', params: {id: props.row.id}}" class="button is-small is-primary">
              <b-icon icon="account-edit" size="is-small"/>
            </router-link>
            <button class="button is-small is-danger" type="button" @click.prevent="trashModal(props.row)">
              <b-icon icon="trash-can" size="is-small"/>
            </button>
          </div>
        </b-table-column>
      </template>

      <section class="section" slot="empty">
        <div class="content has-text-grey has-text-centered">
          <template v-if="isLoading">
            <p>
              <b-icon icon="dots-horizontal" size="is-large"/>
            </p>
            <p>Fetching data...</p>
          </template>
          <template v-else>
            <p>
              <b-icon icon="emoticon-sad" size="is-large"/>
            </p>
            <p>Nothing's here&hellip;</p>
          </template>
        </div>
      </section>
    </b-table>
  </div>
</template>

<script>
import ModalTrashBox from '@/components/ModalTrashBox'

export default {
  name: 'UsersTableSample',
  components: { ModalTrashBox },
  props: {
    dataUrl: {
      type: String,
      default: null
    },
    checkable: {
      type: Boolean,
      default: false
    }
  },
  data () {
    return {
      isModalActive: false,
      trashObject: null,
      users: [],
      isLoading: false,
      paginated: false,
      perPage: 10,
      checkedRows: []
    }
  },
  computed: {
    trashObjectName () {
      if (this.trashObject) {
        return this.trashObject.name
      }

      return null
    }
  },
  created () {
    this.getData()
  },
  methods: {
    getData () {
      if (this.dataUrl) {
        this.isLoading = true
        axios
          .get(this.dataUrl)
          .then(r => {
            this.isLoading = false
            if (r.data && r.data.records) {
              if (r.data.records.length > this.perPage) {
                this.paginated = true
              }
              this.users = r.data.records
            }
          })
          .catch( err => {
            this.isLoading = false
            this.$buefy.toast.open({
              message: `Error: ${e.message}`,
              type: 'is-danger',
              queue: false
            })
          })
      }
    },
    trashModal (trashObject) {
      this.trashObject = trashObject
      this.isModalActive = true
    },
    trashConfirm () {
      this.isModalActive = false

      axios
        .delete(`/api/records/users/${this.trashObject.id}`)
        .then( r => {
          this.getData()

          this.$buefy.snackbar.open({
            message: `Deleted ${this.trashObject.name}`,
            queue: false
          })
        })
        .catch( err => {
          this.$buefy.toast.open({
            message: `Error: ${err.message}`,
            type: 'is-danger',
            queue: false
          })
        })
    },
    trashCancel () {
      this.isModalActive = false
    }
  }
}
</script>
