$(".custom-carousel").owlCarousel({
    autoWidth: true,
    loop: true
  });
  $(document).ready(function () {
    $(".custom-carousel .item").click(function () {
      $(".custom-carousel .item").not($(this)).removeClass("active");
      $(this).toggleClass("active");
    });
  });
 
  // video interactivo
  const video = document.getElementById('video');
  const buttons = document.querySelectorAll('.button');

  function skipTo(seconds) {
      video.currentTime = seconds;
      updateButtons(seconds);
  }

  function updateButtons(seconds) {
      buttons.forEach(button => button.classList.remove('active'));
      if (seconds < 10) {
          document.getElementById('btn1').classList.add('active');
      } else if (seconds < 20) {
          document.getElementById('btn2').classList.add('active');
      } else if (seconds < 30) {
          document.getElementById('btn3').classList.add('active');
      } else if (seconds < 40) {
          document.getElementById('btn4').classList.add('active');
      } else {
          document.getElementById('btn5').classList.add('active');
      }
  }

  video.addEventListener('timeupdate', () => {
      updateButtons(video.currentTime);
  });