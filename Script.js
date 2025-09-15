<script>
  // Animate feature boxes when they enter the viewport
  const featureBoxes = document.querySelectorAll('.feature-box');

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('show');
      }
    });
  } {
    threshold: 0.3
  });

  featureBoxes.forEach(box => {
    observer.observe(box);
  });
  
</script>
