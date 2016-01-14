/**
 * Configurações para a área de opções do componente
 * do instagram
 */
(function() {
  var xhr, // helper para requições
      act = 'redux_hashtag_typeahead',
      act_user = 'redux_profile_typeahead',
      UserException = function(message) {
        this.message = message;
      }; // esta ação buscará as imagens com a hash corrente na digitação

  /**
   * Setup de requisições
   */
  $.ajaxSetup({
    url: getData.ajaxDir,
    dataType: 'html',
    type: 'GET',
    beforeSend: function() {
      $('.hash_wait_res').text('Aguarde');
    },
    complete: function() {
      $('.hash_wait_res').text('');
    },
    error: function(x) {
      console.log(x.statusText); // normalmente irá disparar abort
    }
  });

  /**
   * Imagens recentes: ative/desative no click
   */
   var toggleChoice = function() {
     $('figure','.inst-th').on('click',function() {
       $(this).addClass('active');
       $(this).parent().addClass('active');
     });
   };

   function unselectThumb() {
     $('.unthis').each(function(index, el) {
       $(this).click(function(event) {
         /* Act on the event */
         event.preventDefault();
         $(this).parent()
         .removeClass('active')
         .find('figure').removeClass('active');
       });
     });
   };

  //Hashtags

  /**
   * Quando digitar a hash, faça uma busca imediatamente
   * (Typeahead)
   */
    $('#instagram-hash').on('keyup',function() {
      if(xhr != null) xhr.abort(); // evita o uso de muitas requisições
      var v = $(this).val();

      if(v.length > 3) {
        xhr = $.ajax({
          data: {
            action: act,
            thisValue: v
          },
          success: function(data) {
              $('.jt-view-th').html(data);
              toggleChoice();
              unselectThumb();
          }
        });
      }
    });

    //Busca por perfil
    $('#instagram-userid').on('keyup',function() {
      if(xhr != null) xhr.abort(); // evita o uso de muitas requisições
      var v = $(this).val();

      if(v.length > 3) {
        xhr = $.ajax({
          data: {
            action: act_user,
            thisValue: v
          },
          success: function(data) {
              $('.jt-view-profile').html(data);
              toggleChoice();
              unselectThumb();
          }
        });
      }
    });

    /**
     * Inicie com a consulta da hashtag corrente
     */
    $(window).on('load',function() {

      //inicie resultados da hash corrente
      $.ajax({
        data: {
          action: act,
          thisValue: $('#instagram-hash').val()
        },
        success: function(data) {
            $('.jt-view-th').html(data);
            toggleChoice();
            unselectThumb();
        }
      });

      //inicie resultados do id corrente
      $.ajax({
        data: {
          action: act_user,
          thisValue: $('#instagram-userid').val()
        },
        success: function(data) {
            $('.jt-view-profile').html(data);
            toggleChoice();
            unselectThumb();
        }
      });

      $('.unselect-us').click(function(e) {
        e.preventDefault();
        $('figure','.inst-th').each(function() {
          $(this).removeClass('active');
        });
      });
    });
})();

//Enviar dados para criar objeto
//------------------------------

//Hashtag
(function() {
  /**
   * Ação realizada ao salvar as opções do framework.
   * Envie para o banco apenas as figuras ativas.
   */
   var saveHashOptions = function() {
     $('input#redux_save').on('click', function() {
       var obj, storage = [];
       $('figure.active','.jt-view-th').each(function() {
         var img = $('img',this).eq(0).attr('src'),
             username = $('img',this).eq(0).attr('alt'),
             link = $(this).siblings('.el-instagram').attr('href');

         obj = {thumb: img, user: username, uri: link};
         storage.push(obj);
       });
       if (storage.length > 0) {
         //existe um conteudo a ser armazenado
         //trate ele no servidor
         $.ajax({
           data: {
             action: 'store_hash_imgs', // esta ação é uma função no servidor
             obj: storage // este objeto será tratado no servidor, os dados não devem duplicar
           },
           success: function(data) {
             //console.log(data);
           },
         });
       } else {
         return false;
       }
     });
   };
   saveHashOptions();
})();

//Perfil
(function() {
  /**
   * Ação realizada ao salvar as opções do framework.
   * Envie para o banco apenas as figuras ativas.
   */
   var saveProfileOptions = function() {
     $('input#redux_save').on('click', function() {
       var obj, storage = [];
       $('figure.active','.jt-view-profile').each(function() {
         var img = $('img',this).eq(0).attr('src'),
             username = $('img',this).eq(0).attr('alt'),
             link = $(this).siblings('.el-instagram').attr('href');

         obj = {thumb: img, user: username, uri: link};
         storage.push(obj);
       });
       if (storage.length > 0) {
         //existe um conteudo a ser armazenado
         //trate ele no servidor
         $.ajax({
           data: {
             action: 'store_profile_imgs', // esta ação é uma função no servidor
             obj: storage // este objeto será tratado no servidor, os dados não devem duplicar
           },
           success: function(data) {
             //console.log(data);
           },
         });
       } else {
         return false;
       }
     });
   };
   saveProfileOptions();
})();
