
    const projects = [
      {id:1, title:"TP1", tags:["TP"], short:"TP1", image:"photofunky.gif", details:"Détails du projet 1 : stack, défis, résultats." ,src:"test/testTp1.html",href:"test/testTp1.html"},
    ];



    const navBar = document.getElementById('topNav');
    const tagsContainer = document.getElementById('tags');
    const projectsContainer = document.getElementById('projects');
    const searchInput = document.getElementById('search');
    const modal = document.getElementById('modal');
    const modalLink = document.getElementById('modal-link');
    const year = document.getElementById('year');
    

    let activeTag = 'Tous';

    const tags = ['Tous', ...new Set(projects.flatMap(p => p.tags))];

    function renderTags() {
      tagsContainer.innerHTML = '';
      tags.forEach(tag => {
        const btn = document.createElement('button');
        btn.textContent = tag;
        if (tag === activeTag) btn.classList.add('active');
        btn.onclick = () => { activeTag = tag; renderTags(); renderProjects(); };
        tagsContainer.appendChild(btn);
      });
    }

    function renderProjects() {
      const query = searchInput.value.toLowerCase();
      projectsContainer.innerHTML = '';
      const filtered = projects.filter(p => {
        const matchesTag = activeTag === 'Tous' || p.tags.includes(activeTag);
        const matchesQuery = (p.title + p.short + p.tags.join(' ')).toLowerCase().includes(query);
        return matchesTag && matchesQuery;
      });
      if (filtered.length === 0) {
        projectsContainer.innerHTML = '<p>Aucun projet trouvé.</p>';
      } else {
        filtered.forEach(p => {
          const card = document.createElement('div');
          card.className = 'card';
          card.innerHTML = `<img src="${p.image}" alt="${p.title}"><div class="content"><h3>${p.title}</h3><p>${p.short}</p></div>`;
          card.onclick = () => openModal(p);
          projectsContainer.appendChild(card);
        });
      }
    } 
function openModal(project) {
  document.getElementById('modal-title').textContent = project.title;
  document.getElementById('modal-tags').textContent = project.tags.join(' • ');
  document.getElementById('modal-img').src = project.image;
  document.getElementById('modal-img').alt = project.title;
  document.getElementById('modal-details').textContent = project.details;
  document.getElementById('modal-link').href = project.src;
  modal.classList.add('active'); // Affiche la modale
}



// Ajouter un écouteur d'événement pour fermer le menu en cliquant à l'extérieur
document.addEventListener('click', function(event) {
    const navbar = document.getElementById('topNav');
    const navbarToggler = document.querySelector('.navbar-toggler');
    
    if (!navbar.contains(event.target) && !navbarToggler.contains(event.target)) {
        closeNavbar();
    }
});
function closeModal() {
  modal.classList.remove('active'); // Cache la modale proprement
}

// Fonction pour ouvrir le menu hamburger
function openNavbar() {
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarMenu = document.getElementById('Menu');
    navbarToggler.click(); // Simule un clic pour ouvrir le menu
}

// Fonction pour fermer le menu hamburger
function closeNavbar() {
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarMenu = document.getElementById('Menu');
    
    if (navbarMenu.classList.contains('show')) {
        navbarToggler.click(); // Simule un clic pour fermer le menu
    }
}

    searchInput.addEventListener('input', renderProjects);
    year.textContent = new Date().getFullYear();

    renderTags();
    renderProjects();
  