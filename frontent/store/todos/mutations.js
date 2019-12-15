export default {
  add (state, { data }) {
    state.list.push({
      data,
      done: false
    })
  },

  toggle (state, todo) {
    todo.done = !todo.done
  }
}
