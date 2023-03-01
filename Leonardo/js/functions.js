function pathLoader(file) {
  return `../load/${file}.php`;
}

function pathPosts(file) {
  return `../acao/${file}.php`;
}

function loaderPage(id) {
  $(`#${id}`).html('Carregando..');
}

function _loadPage(id, file, data = {}, callback = () => { }) {
  $(`#${id}`).load(pathLoader(file), data, callback);
}

function _postPage(file, data = {}, callback = () => { }) {
  $.post(pathPosts(file), data, callback);
}