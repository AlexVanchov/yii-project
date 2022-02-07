var base_url = ''
var maxPages = 0;
$(document).ready(async function () {
    base_url = $('body').attr('base-url');

    if ($('#isNews').val() !== undefined) { // by name
        filtersListener();
        data = await getNews();

        var news = data.data;
        var count = data.count;

        loadPagination(count);

        loadNews(news)
    }
    if ($('#isNewsCategories').val() !== undefined) {
        $('#keyword-btn').click(async function () {

            $('#current_category').text("Search results for - " + $('#keyword').val());

            $('#categories-container').attr('hidden', 'hidden');
            data = await getNews();

            var news = data.data;
            var count = data.count;

            loadPagination(count);

            loadNews(news)
            $('#news_list_container').removeAttr('hidden');
            $('#back-to-categories').click(function (event) {
                event.preventDefault();
                $('#news_list_container').attr('hidden', 'hidden');
                $('#categories-container').removeAttr('hidden');

            });
        })
        $("#keyword").autocomplete({
            source: []
        });
        $('#keyword').keyup(async function () {
            var availableTags = [];

            var autocompleteTitles = await getNewsAutocomplete();
            autocompleteTitles = autocompleteTitles.data

            for (let i = 0; i < autocompleteTitles.length; i++) {
                const el = autocompleteTitles[i];
                if (!availableTags.includes(el.title)) {
                    availableTags.push(el.title)
                }
            }
            $("#keyword").autocomplete({
                source: availableTags
            });
        })
    }
    if ($('#isViewNews').val() !== undefined) {
        var splide = new Splide( '.splide', {
            type  : 'fade',
            rewind: true,
          } );
          
          splide.mount();
    }



    $('.delete-btn').click(function (event) {
        event.preventDefault();
        $('#confirm-modal').modal('show');
        var href = $(event.currentTarget).attr('href')

        $('#confirm-btn').attr('href', href);

    });
})
async function loadPagination(count) {
    clearPagination();
    maxPages = Math.ceil(count / 6)
    for (let i = maxPages; i > 0; i--) {
        var element = $('#template-paggination').clone()
        element.attr('id', 'page' + i);
        element.removeAttr('hidden')
        element.addClass('added-item')
        element.find('.page-link').html(i);
        i == 1 ? element.addClass('active') : '';
        element.click(async function (event) {
            var page = $(event.currentTarget).find('.page-link').html()
            $(event.currentTarget).addClass('active').siblings().removeClass('active');
            $('#page').val(page)
            data = await getNews();
            loadNews(data.data)

        })
        $('.page-item:visible').first().after(element)
    }
}

async function filtersListener() {
    $('#sort-name-btn').click(async function () {
        if ($('#sort-name-btn').find('.fa').hasClass('fa-arrow-up')) {
            $('#sort-name-btn').find('.fa').removeClass('fa-arrow-up').addClass('fa-arrow-down')
            $('#sort-name').val('-');
        } else if ($('#sort-name-btn').find('.fa').hasClass('fa-arrow-down')) {
            $('#sort-name-btn').find('.fa').removeClass('fa-arrow-down');
            $('#sort-name').val('');
        } else {
            $('#sort-name-btn').find('.fa').removeClass('fa-arrow-down').addClass('fa-arrow-up');
            $('#sort-name').val('+');
        }

        data = await getNews();
        loadNews(data.data)
    });
    $('#sort-date-btn').click(async function () { // by date
        if ($('#sort-date-btn').find('.fa').hasClass('fa-arrow-up')) {
            $('#sort-date-btn').find('.fa').removeClass('fa-arrow-up').addClass('fa-arrow-down')
            $('#sort-date').val('-');
        } else if ($('#sort-date-btn').find('.fa').hasClass('fa-arrow-down')) {
            $('#sort-date-btn').find('.fa').removeClass('fa-arrow-down');
            $('#sort-date').val('');
        } else {
            $('#sort-date-btn').find('.fa').removeClass('fa-arrow-down').addClass('fa-arrow-up');
            $('#sort-date').val('+');
        }

        data = await getNews();
        loadNews(data.data)
    });
}

function clearPagination() {
    $('.added-item').remove();
}
async function changePage(operation) {
    var page = $('#page').val();
    if (operation == '+') {
        page = parseInt(page) + 1;
    } else if (operation == '-') {
        page = parseInt(page) - 1;
    }

    if (page > 0 && page <= maxPages) {
        $('#page').val(page)
        $('.page-item').removeClass('active');
        $('#page' + page).addClass('active');
        data = await getNews();
        loadNews(data.data)
    }
}
async function getNews() {
    var res = '';
    var url = base_url + "/site/get-news";
    var sortName = $('#sort-name').val();
    var sortDate = $('#sort-date').val();
    await $.ajax({
        url: url,
        type: 'post',
        data: {
            page: $('#page').val(),
            sortName: sortName,
            sortDate: sortDate,
            _csrf: $('#csrf').val(),
            category_id: $('#category_id').val() == undefined ? "0" : $('#category_id').val(),
            keyword: $('#keyword').val() == undefined ? "" : $('#keyword').val()
        },
        success: function (data) {
            data = JSON.parse(data);
            res = data;

        }
    });

    return res;
}
async function getNewsAutocomplete() {
    var res = '';
    var url = base_url + "/site/get-news-autocomplete";
    var sortName = $('#sort-name').val();
    var sortDate = $('#sort-date').val();
    await $.ajax({
        url: url,
        type: 'post',
        data: {
            page: $('#page').val(),
            sortName: sortName,
            sortDate: sortDate,
            _csrf: $('#csrf').val(),
            category_id: $('#category_id').val() == undefined ? "0" : $('#category_id').val(),
            keyword: $('#keyword').val() == undefined ? "" : $('#keyword').val()
        },
        success: function (data) {
            data = JSON.parse(data);
            res = data;

        }
    });

    return res;
}

function loadNews(news) {
    $('#news-container').html('');
    for (const news_el in news) {
        if (Object.hasOwnProperty.call(news, news_el)) {
            const element = news[news_el];

            var template = $('#news_template').clone();
            template.removeAttr('id');
            template.removeAttr('hidden');
            template.find('#news-title').text(element.title);
            template.find('#news-description').text(element.description);
            template.find('#news-date').text(element.date);
            template.find('#news-content').text(element.content);
            template.find('#news-image').attr('src', base_url + '/' + (element.images[0] == null ? 'images/news.jpg' : element.images[0]));
            template.find('#news-edit').attr('href', base_url + '/site/view-news?id=' + element.id);
            $('#news-container').append(template);
        }
    }
}

async function loadNewsByCategory(category_id) {
    $('#keyword').val('');
    $('#category_id').val(category_id);
    $('#current_category').text("News in - " + $('#cat-' + category_id).text());

    $('#categories-container').attr('hidden', 'hidden');
    $('#search-container').attr('hidden', 'hidden');

    $('#news_list_container').removeAttr('hidden');

    $('#page').val(1);
    data = await getNews();

    var count = data.count;

    loadPagination(count);
    loadNews(data.data)

    $('#back-to-categories').click(function (event) {
        event.preventDefault();
        $('#categories-container').removeAttr('hidden');
        $('#search-container').removeAttr('hidden');
        $('#news_list_container').attr('hidden', 'hidden');
        $('#category_id').val('0');
        $('#news-container').html('');
    });
}