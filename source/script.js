$("form").submit(function(e){
  e.preventDefault();
  const title = $("#title").val()
  const content = $("#content").val()
  const category = $("#category").val()

  if(!title || !content || !category) return;

  $.ajax({
    url: "http://localhost:8080/backend/create.php",
    method: "POST",
    dataType: "json",
    data: {
      title,
      content,
      category
    }
  }).done(function(results){
    console.log(results)
  })

  $("#title").val("")
  $("#content").val("")
  $("#category").val("")
})

function getAll(){
  $.ajax({
    url: "http://localhost:8080/backend/fetch-news.php",
    method: "GET",
    dataType: "json",
  }).done(function(results){
    results.forEach(function(news){
      $("section").prepend(` 
        <div class="card">
          <div class="header-card">
            <h2>${news.title}</h2>
            <p>${news.content}</p>
            <!-- <div class="category">
              <span>${news.category}</span>
            </div> -->
          </div>
          <div class="button-card">
            <a href="?page=article&news=${news.id}">Acessar</a>
          </div>
        </div>
      `)
    });
    fetcherNews()
  })
}

function fetcherNews(){
  /**
   * This method avoids making unnecessary bank inquiries
   * **/

  fetcherNewsFrontend()

  /**
   * This slow method is less efficient due to unnecessary queries, but it works!
   * **/

  // fetcherNewsDatabase()
}

function fetcherNewsFrontend(){
   /**
   * Esté metodo evita de fazer consultas desnecessarias no banco
   * **/
  $("header nav input").on("input",function({target}){
    const search = target.value.toLowerCase();
    const cards = $(".card");
    
    cards.each(function(){
      const cardText = $(this).text().toLowerCase();
      if (cardText.includes(search) || search === "") {
          $(this).removeClass("none");
      } else {
          $(this).addClass("none");
      }
    });
  })
}

function fetcherNewsDatabase(){
  /**
   * Esté metodo e menos eficiente por consulta desnecessarias!
   * **/
  $("header nav input").on("input",function({target}){
    const search = target.value.toLowerCase();
    $.ajax({
      url: "http://localhost:8080/backend/search.php",
      method: "POST",
      dataType: "json",
      data: {
        search
      }
    }).done(function(results){
      $("section").html("")
      results.forEach(function(news){
        $("section").prepend(` 
          <div class="card">
            <div class="header-card">
              <h2>${news.title}</h2>
              <p>${news.content}</p>
              <!-- <div class="category">
                <span>${news.category}</span>
              </div> -->
            </div>
            <div class="button-card">
              <a href="?page=article&news=${news.id}">Acessar</a>
            </div>
          </div>
        `)
      })
    })
  })
}

getAll()
fetcherNews()

$(document).ready(function() {
  if (!window.location.search && window.location.search === "") {
    $("header nav input").focus();
  }

  $("header nav input").click(function(e){
    if (window.location.pathname !== "/index.php" || window.location.search) {
      window.location.href = "index.php";
    }
  });
});


$("main article .title button").click(function(){
  const id = this.dataset.id

  $.ajax({
    url: "http://localhost:8080/backend/delete-news.php",
    method: "POST",
    dataType: "json",
    data:{
      id
    }
  }).done(function(results){
    window.location.href = "index.php"
  })
})