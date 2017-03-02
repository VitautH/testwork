<article>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Гостевая книга</h1>
                <p class="intro">Lorem ipsum alert to pointer. <br>C++ Run time type information dynamic_cast.</p>
            </div>
        </div>
<div class="row">
    <?php
    if(isset($_POST['add_message'])){
        $add_message= Factory::load("Controller/", "Controller_guest_book");
        $result= $add_message->action_Add_message();
    }
    ?>
    <div class="form_container col-lg-6">

        <form method="post" enctype="multipart/form-data" action="#" id="form_chek">
            <ul class="form">
                <h3>Добавить сообщение</h3>
                <li><label>Имя <span class="required">*</span></label><input type="text" id="name" name="name" class="field-divided" required/>
                    <label>E-mail <span class="required">*</span></label>
                    <input type="email"  id="email" name="email" class="field-divided" required/>
                </li>


                <li>
                    <label>Сообщение <span class="required">*</span></label>
                    <textarea name="message" id="message" class="field-long field-textarea" required></textarea>
                </li>
                <li>
                    <label>Прикрепить изображение</label>
                         <input type="file" name="fileupload" class="fileupload">
                   </li>
                <li>
                <li> <div class="g-recaptcha" data-sitekey="6Lf78BYUAAAAACI_Qm-4vueIpqsJWbCYBLwQ-bNU"></div></li>
                <input type="submit" class="send_message" name="add_message" value="Отправить" />
                </li>
            </ul>
        </form>

</div>
</div>

    <div class="row items-container">
        <?php
        /*
         *   Отображаем  сообщения гостевой книги
         */
       $guest_book_view= Factory::load("Controller/", "Controller_guest_book");
      $result= $guest_book_view->action_View_message();
        /*
         *  Конвертируем e-mail в аватарку
         */
        function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
            $url = 'https://www.gravatar.com/avatar/';
            $url .= md5( strtolower( trim( $email ) ) );
            $url .= "?s=$s&d=$d&r=$r";
            if ( $img ) {
                $url = '<img src="' . $url . '"';
                foreach ( $atts as $key => $val )
                    $url .= ' ' . $key . '="' . $val . '"';
                $url .= ' />';
            }
            return $url;
        }



    foreach ($result as $row) {

        ?>

        <section>
            <div class="col-xs-12 col-sm-12 col-lg-12 item ">


                <div class="block_left col-xs-2 col-sm-2 col-lg-2">
                    <div class="row">
                        <div class="name"><?php echo $row['name']; ?></div>
                    </div>
                    <div class="row"><img class="avatar" src="<?php echo get_gravatar($row['email']); ?>"/></div>
                </div>
                <div class="block_right col-xs-9 col-sm-9 col-lg-9">
                    <div class="message">
                        <?php echo $row['message']; ?>
                    </div>
                    <?php if(!empty ($row['img'])) {
                        ?>

                        <div class="img_attach">
                            <img src="../upload/<?php echo $row['img']; ?>"/>
                        </div>
                        <?php
                    }
            ?>
                </div>

            </div>
        </section>

        <?php

    }
        /*
               *   Получаем количество страниц для отображения пагинации
                 *
               */
        $pagination= Factory::load("Controller/", "Controller_guest_book");
        $current_page = $pagination->page; // Получаем номер текущей страницы
        $result= $pagination->action_Pagination();

        ?>


    </div>

        <div class="row">
            <div class="col-lg-12">
            <nav aria-label="Page navigation">

                <ul class="pagination">

                    <?php
                    $i=0;

                    while ( $i< $result){
                        $i++;




                        if ( $current_page  == $i){
                            ?>
                            <li class="pagination-active"><a><? echo $i;?></a></li>
                            <?php
                        }
                        else {
                            ?>

                            <li>
                                <a class="" href="<? echo $i; ?>"
                                   title="Страница <? echo $i; ?>"><? echo $i; ?></a>
                            </li>


                            <?
                        }
                    }

                    ?>

                </ul>
            </nav>
        </div>
        </div>


    </div>
</article>
