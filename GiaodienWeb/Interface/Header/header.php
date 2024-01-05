<?php
     $query = "SELECT * FROM tbl_menu";
     $menuResult = mysqli_query($con, $query);   
                
       while ($menuRow = mysqli_fetch_assoc($menuResult)) {
       echo '<li ><a  href="' . $menuRow['menu_link'] . '">' . $menuRow['menu_name'] . '</a>';
      $submenu1Id = $menuRow['menu_id'];
      $submenu1Query = "SELECT * FROM tbl_submenu1 WHERE menu_id = $submenu1Id";
      $submenu1Result = mysqli_query($con, $submenu1Query);

      if (mysqli_num_rows($submenu1Result) > 0) {
       echo'<i class="arrow-icon"></i>';
        echo '<ul class="submenu">';
         while ($submenu1Row = mysqli_fetch_assoc($submenu1Result)) {
            $submenu1Id = $submenu1Row['submenu1_id'];
            echo '<li data-submenu1-id="'.$submenu1Id.'"><a href="#"onclick="loadCategory(' . $submenu1Id . ');">' . $submenu1Row['submenu1_name'] . '</a>';
            echo '</span>';
            $submenu2Query = "SELECT * FROM tbl_submenu2 WHERE submenu2_id = $submenu1Id";
            $submenu2Result = mysqli_query($con, $submenu2Query);

            if (mysqli_num_rows($submenu2Result) > 0) {
                echo '<ul class="submenu2">';
                while ($submenu2Row = mysqli_fetch_assoc($submenu2Result)) {
                    echo '<li><a href="">' . $submenuRow['submenu2_name'] . '</a></li>';
                }
       echo '</ul>';
          }
            echo '</li>';
                }
                    echo '</ul>';
                           }
                      echo '</li>';
                     }
                    ?>