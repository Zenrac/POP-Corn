<ul>
  <?php
    echo "<li><a href=".get_path('index.php').">Accueil</a></li>";
  ?>
  <li>
    <ul class="deroul">
      <li>
        <a href="">Tops</a>
        <ul>
          <?php
            echo "<li><a href=".get_path('pages/top2019.php').">Top 2019</a></li>";
                            echo "<li><a href=".get_path('pages/top2018.php').">Top 2018</a></li>";
          ?>
        </ul>
      </li>
    </ul>
  </li>

</ul>
