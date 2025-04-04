/* 
 * AJAX Posts 
 */
jQuery(function ($) {
  class AjaxPosts {
    constructor(){
      this.state();
      this.query();
      this.events();
    }

    state(){
      this.filters = {
        'pageIndex': 1,
        'c': '',
      };
    }

    query(){
      this.ajaxContainer = $('.js-ajax-posts');
    }

    events(){
      $(document).on("click", ".js-filter", this.update.bind(this));
      $(document).on("click", ".js-reset-filters", this.reset.bind(this));
      $(document).on("click", "a.page-numbers", this.updatePage.bind(this));
    }

    reset(e){
      e.preventDefault(e);
      this.filters = {
        'pageIndex': 1,
        'c': '',
      };
      this.fetch();
    }

    update(e){
      e.preventDefault();

      // get filter key and value from data attribute
      const $target = $(e.target);
      const filter = $target.data();
      const entries = Object.entries(filter);
      const [key, value] = entries[0];

      if (this.filters[key] === value) {
        delete this.filters[key];
      } else {
        this.filters[key] = value;
      }

      // go to the first page
      this.filters['pageIndex'] = 1;
      this.fetch();
    }

    updatePage(e){
      e.preventDefault();

      // get page query parameter from link href
      const $target = $(e.target).closest('a');
      const url = new URL($target.attr('href'));
      const page = url.searchParams.get('pageIndex');

      // don't do anything if this is current page
      if(this.filters['pageIndex'] === page){
        return;
      }

      this.filters['pageIndex'] = page;
      this.fetch();
    }

    fetch(){
      const filters = this.filters;
      const data = {
        action: 'get_filtered_posts',
        ...filters,
      };

      $.ajax({
        type: 'GET', 
        data: data,
        url: codelibry.ajax_url,
        beforeSend: () => {
          this.ajaxContainer.html(postsAjaxLoader());
        },
        success: (response) => {
          this.ajaxContainer.html(response);
          this.updateUrl(data);
        },
        error: (xhr, status, error) => {
          console.log(xhr, status, error);
        }
      });
    }

    updateUrl(params) {
      const newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?' + $.param(params);
      window.history.pushState({ path: newUrl }, '', newUrl);
    }
  }

  if($('.js-ajax-posts').length) {
    window.ajaxPosts = new AjaxPosts();
  }

});


function postsAjaxLoader() {
  return `
    <div class="xxlarge-12 cell pt-100 mt-50">
      <div class="article-grid">
        <div class="column">

          <article class="skeleton-article">
            <div class="skeleton-image skeleton"></div>
            <div class="skeleton-title skeleton"></div>
            <div class="skeleton-meta">
              <div class="skeleton-date skeleton"></div>
              <div class="skeleton-tags">
                <div class="skeleton-tag skeleton"></div>
                <div class="skeleton-tag skeleton"></div>
              </div>
            </div>
          </article>

          <article class="skeleton-article">
            <div class="skeleton-image skeleton"></div>
            <div class="skeleton-title skeleton"></div>
            <div class="skeleton-meta">
              <div class="skeleton-date skeleton"></div>
              <div class="skeleton-tags">
                <div class="skeleton-tag skeleton"></div>
                <div class="skeleton-tag skeleton"></div>
              </div>
            </div>
          </article>

          <article class="skeleton-article">
            <div class="skeleton-image skeleton"></div>
            <div class="skeleton-title skeleton"></div>
            <div class="skeleton-meta">
              <div class="skeleton-date skeleton"></div>
              <div class="skeleton-tags">
                <div class="skeleton-tag skeleton"></div>
                <div class="skeleton-tag skeleton"></div>
              </div>
            </div>
          </article>

          <article class="skeleton-article">
            <div class="skeleton-image skeleton"></div>
            <div class="skeleton-title skeleton"></div>
            <div class="skeleton-meta">
              <div class="skeleton-date skeleton"></div>
              <div class="skeleton-tags">
                <div class="skeleton-tag skeleton"></div>
                <div class="skeleton-tag skeleton"></div>
              </div>
            </div>
          </article>

          <article class="skeleton-article">
            <div class="skeleton-image skeleton"></div>
            <div class="skeleton-title skeleton"></div>
            <div class="skeleton-meta">
              <div class="skeleton-date skeleton"></div>
              <div class="skeleton-tags">
                <div class="skeleton-tag skeleton"></div>
                <div class="skeleton-tag skeleton"></div>
              </div>
            </div>
          </article>

          <article class="skeleton-article">
            <div class="skeleton-image skeleton"></div>
            <div class="skeleton-title skeleton"></div>
            <div class="skeleton-meta">
              <div class="skeleton-date skeleton"></div>
              <div class="skeleton-tags">
                <div class="skeleton-tag skeleton"></div>
                <div class="skeleton-tag skeleton"></div>
              </div>
            </div>
          </article>

        </div>
      </div>
    </div>
  `;
}
