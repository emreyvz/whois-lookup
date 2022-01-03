function bringData() {

    var domain = document.getElementById('text').value;

    if (domain.indexOf('.') < 0)
    {
        Toastify({
        text: "Domain name is not valid",
        duration: 3000,
        gravity: "top", 
        position: "center", 
        stopOnFocus: true, 
        style: {
          background: "linear-gradient(to right, #D97F6F, #CC2D10)",
        },
        onClick: function(){} 
      }).showToast();
      return;
    }
    var loading = document.getElementById('loading');
    loading.style.display = "table";
    const queryPanel = document.querySelector('#queryPanel');
    queryPanel.classList.remove('animate__zoomInDown');
    queryPanel.classList.add('animate__animated', 'animate__bounceOutLeft');
    var url = document.getElementById('text').value;
            

    $.ajax({
       url: "https://api.promptapi.com/whois/query?domain=" + url,
       data: { "apikey": "YOUR_APIKEY" },
       type: "GET",
       beforeSend: function(xhr){xhr.setRequestHeader('apikey', 'YOUR_APIKEY');},
       success: function(result) { 
          var loading = document.getElementById('loading');
          loading.style.display = "none";
          console.log(result);
          document.getElementById("query").style.display = "none";
          document.getElementById("result").style.display = "table";
          queryPanel.classList.remove('animate__bounceOutLeft');
          queryPanel.classList.add('animate__animated', 'animate__bounceInLeft');
          document.getElementById('domain_name').value = result.result.domain_name;
          document.getElementById('registrar').value =  result.result.registrar;
          document.getElementById('expiration_date').value = result.result.expiration_date;
          document.getElementById('name_servers').value = result.result.name_servers.toString();
          document.getElementById('creation_date').value = result.result.creation_date;
          document.getElementById('emails').value = result.result.emails;
          document.getElementById('address').value = result.result.address;
          document.getElementById('country').value = result.result.country;
          document.getElementById('siteName').innerHTML = url + " Details";
        }
    });


  }

  function goBack() {
    const queryPanel = document.querySelector('#queryPanel');
    document.getElementById("text").value = "";
    document.getElementById('domain_name').value = "";
    document.getElementById('registrar').value =  "";
    document.getElementById('expiration_date').value = "";
    document.getElementById('name_servers').value = "";
    document.getElementById('creation_date').value = "";
    document.getElementById('emails').value = "";
    document.getElementById('address').value = "";
    document.getElementById('country').value = "";
    queryPanel.classList.remove('animate__bounceInLeft');
    queryPanel.classList.add('animate__animated', 'animate__bounceOutLeft');
    setTimeout(() => {
      document.getElementById("query").style.display = "table";
      document.getElementById("result").style.display = "none";
      queryPanel.classList.remove('animate__bounceOutLeft');
      queryPanel.classList.add('animate__animated', 'animate__zoomInDown');
    }, 1000);
  }

  function handleKeyPress(e){
  var key=e.keyCode || e.which;
    if (key==13){
      bringData();
    }
  }