<?php

?>
<ul class="product_list row list">
    <?php
        for($row=1; $row<sizeof($list_box_contents); $row++) 
        {
    ?>
    <li class="col-xs-12">
        <div class="product-container">
            <div class="row">
                <?php
                    for($col=0;$col<sizeof($list_box_contents[$row]);$col++)  
                    {
                        if (isset($list_box_contents[$row][$col]['text'])) 
                        {
                            if($col == 0) // product image
                            {
                                ?>
                                <div class="img">
                                        <?php echo $list_box_contents[$row][$col]['text'] ?>
                                </div>
                                <?php
                            }
                            if($col == 1) // product description
                            {
                                ?>
                                <div class="center-block col-xs-4 col-xs-7 col-md-4">
                                    <?php echo $list_box_contents[$row][$col]['text'] ?>
                                </div>
                                <?php
                            }
                            if($col == 2)
                            {
                                ?>
                                <div class="product-buttons">
                                    <div class="content_price col-xs-5 col-md-12">
                                        <?php echo $list_box_contents[$row][$col]['text'] ?>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </li>
    <?php
        } 
    ?>
</ul>