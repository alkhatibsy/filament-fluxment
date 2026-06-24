document.addEventListener('DOMContentLoaded', () => {
   document.addEventListener('theme-changed', (e) => {
    Flux.appearance = e.detail
   });
});