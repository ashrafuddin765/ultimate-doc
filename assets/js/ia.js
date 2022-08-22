new Vue({
    el: '#ud-ia',
    data: {
        editurl: '',
        viewurl: '',
        docs: [],
        componentKey: 0,
        doc_search: '',
        article_search: '',
        errors: [],
        name: '',
        email: '',
        subject: '',
        message: ''
    },
    // computed: {
    //     resultQuery(docs_arr) {
    //         if (this.doc_search) {
    //             return this.docs_arr.filter(item => {
    //                 return this.doc_search.toLowerCase().split(" ")
    //                 .every(v => item.post.title.toLowerCase().includes(v));
    //             });
    //         } else {
    //             return this.docs_arr;
    //         }
    //     }
    // },
    mounted: function () {
        var self = this,
            dom = jQuery(self.$el);

        dom.find('ul.docs').removeClass('not-loaded').addClass('loaded');

        jQuery.post(
            ud_vars.ajaxurl, {
                action: 'ud_get_articles',
                _wpnonce: ud_vars.nonce,
                current_page_id: ud_vars.pageID,
            },
            function (data) {
                dom.find('.spinner').remove();
                dom.find('.ud-no-docs').removeClass('not-loaded');

                self.docs = data.data;
                console.log(data.data)
            }
        );


    },

    methods: {
        onError: function (error) {
            alert(error);
        },

        swalInputValidator: function (value) {
            if (!value) {
                return 'You need to write something';
            }
        },

        searchDoc: function (docs_arr) {
            if (this.doc_search) {
                return docs_arr.filter(item => {
                    return this.doc_search.toLowerCase().split(" ").every(v => item.post.title.toLowerCase().includes(v)) || this.doc_search.toLowerCase().split(" ").every(v => item.post.content.toLowerCase().includes(v));
                });
            } else {
                return docs_arr;
            }
        },
        searchAeticle: function (docs_arr) {

            if (this.article_search) {
                return docs_arr.filter(item => {
                    return this.article_search.toLowerCase().split(" ").every(v => item.post.title.toLowerCase().includes(v)) || this.article_search.toLowerCase().split(" ").every(v => item.post.content.toLowerCase().includes(v));
                });
            } else {
                return docs_arr;
            }
        },

        // searchArticle: function (el) {

        //     var that = this;
        //     this.docs = this.docs || [],
        //         form = el.path[0],
        //         doc_search = jQuery(form).find('[name=doc_search]').val(),
        //         article_search = jQuery(form).find('[name=article_search]').val();

        //     var data = {
        //         action: 'ud_search_article',
        //         s: doc_search,
        //         // article_search: article_search,
        //         _wpnonce: ud_vars.nonce,
        //     }

        //     jQuery.post(ud_vars.ajaxurl, data, function (resp) {

        //         that.docs = resp.data

        //         console.log(resp.data)
        //     });

        // },
        sendMail: function (el) {


            var data = {
                action: 'ud_send_mail',
                name: this.name,
                email: this.email,
                subject: this.subject,
                message: this.message,
                _wpnonce: ud_vars.nonce,
            }

            jQuery.post(ud_vars.ajaxurl, data, function (resp) {

                console.log(resp.data)
            });

        },
        showArticle: function (el, doc) {
            var wrap = el.path[0]

            jQuery(wrap).parent().find('.ud-entry-content').html('<h3 class=\'ud-title\'> <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M4.75 8H9.25M4.75 11H9.25M10.75 14.75H3.25C2.42157 14.75 1.75 14.0784 1.75 13.25V2.75C1.75 1.92157 2.42157 1.25 3.25 1.25H7.43934C7.63825 1.25 7.82902 1.32902 7.96967 1.46967L12.0303 5.53033C12.171 5.67098 12.25 5.86175 12.25 6.06066V13.25C12.25 14.0784 11.5784 14.75 10.75 14.75Z" stroke="#111827" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /> </svg>' + doc.post.title + "</h3>" + doc.post.content);
            jQuery(wrap).parent().find('.full-article').addClass('active').parent('li').addClass('active').siblings().hide()

        },
        hideArticle: function (el) {
            jQuery(el.path[0]).parent().removeClass('active').parent('li').removeClass('active').siblings('li').show();
            jQuery(el.path[0]).siblings('.ud-entry-content').html('');
        },
        showArticles: function (el, id) {
            var wrap = el.path[0]
            jQuery(wrap).parent('.doc-content-wrap').siblings('.sections').addClass('active');

        },

        hideArticles: function (el) {

            var wrap = el.path[0]
            jQuery(wrap).parent('.sections').removeClass('active');
        },

        pluralize: function (val, word, plural = word + 's') {
            const _pluralize = (num, word, plural = word + 's') => [1, -1].includes(Number(num)) ? word : plural;
            if (typeof val === 'object') return (num, word) => _pluralize(num, word, val[word]);
            return _pluralize(val, word, plural);
        }

    },
});


(function ($) {

    $('.ud-ia-toggler div').on('click', function () {
        $(this).removeClass('active').siblings().addClass('active').parent().siblings('.ud-ia-main').toggleClass('active');
    })

})(jQuery);