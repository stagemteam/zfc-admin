StagemPreloader = {
  //this.body = jQuery('body');
  body: $('body'),

  /**
   *
   * @param wrapped Element which should be wrapped with preloader
   */
  load: function (wrapped) {
    //this.body.setmask("Подождите пожалуйста ...");
    wrapped.after('<div class="preload"><img class="img-preloader" src="/img/preloader-3.gif" alt=""></div>');
    wrapped.parent().addClass('preloader');
  },

  hide: function (wrapped) {
    //console.log(wrapped);
    wrapped.parent().removeClass('preloader');
    wrapped.siblings('.preload').remove();
  }
};