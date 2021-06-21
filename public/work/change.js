

  const test = document.getElementById('maybe');
  const test_2 = test.getElementsByClassName('opinion');

  onload = function() {
    for (let i = 0; i < test_2.length; i++) {
      const tLength = test_2[i].textContent;
      if (tLength.length > 25) {
        test_2[i].innerHTML = tLength.substr(0, 25) + '...';

        test_2[i].addEventListener("mouseover", function(event) {
          event.target.innerHTML = tLength;
        });

        test_2[i].addEventListener("mouseout", function (event) {
          event.target.innerHTML = tLength.substr(0, 25) + '...'
        });
      }
    }
  }