<template>
  <div class="container">
    <h2>Events</h2>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item">
          <a class="page-link" href="#" @click="fetchEvents(pagination.prev_page_url)">Previous</a>
        </li>

        <li class="page-item disabled">
          <a
            class="page-link text-dark"
            href="#"
          >Page {{ pagination.current_page }} of {{ pagination.last_page }}</a>
        </li>

        <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item">
          <a class="page-link" href="#" @click="fetchEvents(pagination.next_page_url)">Next</a>
        </li>
      </ul>
    </nav>
    <div class="my-3 p-3 bg-white rounded shadow-sm" v-for="event in events" v-bind:key="event.id">
      <h6 class="border-bottom border-gray pb-2 mb-0">{{ event.event_name }}</h6>
      <div class="media text-muted pt-3">
        <svg
          class="bd-placeholder-img mr-2 rounded"
          width="32"
          height="32"
          xmlns="http://www.w3.org/2000/svg"
          preserveAspectRatio="xMidYMid slice"
          focusable="false"
          role="img"
          aria-label="Placeholder: 32x32"
        >
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="#007bff" />
          <text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
        </svg>
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
          <strong class="d-block text-gray-dark">Venue</strong>
          {{ event.venue }}
        </p>
      </div>
      <div class="media text-muted pt-3">
        <svg
          class="bd-placeholder-img mr-2 rounded"
          width="32"
          height="32"
          xmlns="http://www.w3.org/2000/svg"
          preserveAspectRatio="xMidYMid slice"
          focusable="false"
          role="img"
          aria-label="Placeholder: 32x32"
        >
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="#e83e8c" />
          <text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text>
        </svg>
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
          <strong class="d-block text-gray-dark">Date</strong>
          {{ event.start_time }}
        </p>
      </div>

      <small class="d-block text-right mt-3">
        <a :href="`/client/`+event.id" class="btn btn-primary">Buy Tickets</a>
      </small>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      events: [],
      event_id: "",
      pagination: {},
      edit: false
    };
  },

  created() {
    this.fetchEvents();
  },

  methods: {
    fetchEvents(page_url) {
      let vm = this;
      page_url = page_url || "/api/events";
      fetch(page_url)
        .then(res => res.json())
        .then(res => {
          this.events = res.data;
          console.log(this.events);
          vm.makePagination(res.meta, res.links);
        })
        .catch(err => console.log(err));
    },
    makePagination(meta, links) {
      let pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev
      };

      this.pagination = pagination;
    },
    viewEvent(id) {
      fetch(`api/events/${id}`, {
        method: "get"
      })
        .then(res => res.json())
        .then(data => {
          this.fetchEvents();
        })
        .catch(err => console.log(err));
    }
  }
};
</script>
