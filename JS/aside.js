window.addEventListener('scroll', function() {
    var aside = document.getElementById('miAside');
    var subtemas = document.querySelectorAll('.subtemas');
    var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollPosition >= 800) {
        aside.style.position = 'fixed';
        aside.style.top = '30px';
    } else {
        aside.style.position = 'absolute';
        aside.style.top = '800px';
    }

    if (scrollPosition >= 3400) {
        aside.style.height = '520px';

        for (const subtema of subtemas) {
        subtema.style.marginTop = '5px';
        }
    } else {
        aside.style.height = '620px';
        for (const subtema of subtemas) {
        subtema.style.marginTop = '15px';
        }
    }
    });