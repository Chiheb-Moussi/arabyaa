function addUrlParameter(name, value, id_element = '') {
    if (id_element) value = document.getElementById(id_element).value;
    var searchParams = new URLSearchParams(window.location.search)
    searchParams.set(name, value)
    window.location.search = searchParams.toString()
}