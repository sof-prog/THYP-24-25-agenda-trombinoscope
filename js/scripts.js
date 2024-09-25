// scripts.js
function showMore(element) {
    const card = element.closest('.card');
    const cardBody = element.closest('.card-body');
    const fullContent = cardBody.querySelector('.full-content');
    const cardContent = cardBody.querySelector('.card-content');
    const readLess = cardBody.querySelector('.read-less');
  
    // Masquer le contenu partiel et afficher le contenu complet avec scrollbar
    cardContent.style.display = 'none';
    fullContent.style.display = 'block';
    fullContent.style.overflowY = 'auto';
  
    // Agrandir la carte
    card.classList.add('expanded');
  
    // Masquer le bouton "Lire plus" et afficher le bouton "Lire moins"
    element.style.display = 'none';
    readLess.style.display = 'inline';
  }
  
  function showLess(element) {
    const card = element.closest('.card');
    const cardBody = element.closest('.card-body');
    const fullContent = cardBody.querySelector('.full-content');
    const cardContent = cardBody.querySelector('.card-content');
    const readMore = cardBody.querySelector('.read-more');
  
    // Réafficher le contenu partiel et cacher le contenu complet
    cardContent.style.display = 'block';
    fullContent.style.display = 'none';
  
    // Réduire la carte
    card.classList.remove('expanded');
  
    // Afficher le bouton "Lire plus" et masquer le bouton "Lire moins"
    element.style.display = 'none';
    readMore.style.display = 'inline';
  }
  