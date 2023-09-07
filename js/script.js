function openNav() {
  document.getElementById('funMobileNav').style.height = '100%'
}

function closeNav() {
  document.getElementById('funMobileNav').style.height = '0%'
}

const mobileCloseIconEl = document.getElementById('mobileCloseIcon')
mobileCloseIconEl.addEventListener('click', () => {
  closeNav()
})

const mobileOpenIconEl = document.getElementById('mobileOpenIcon')
mobileOpenIconEl.addEventListener('click', () => {
  openNav()
})
