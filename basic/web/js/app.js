var base_url = ''
var maxPages = 0;
$(document).ready(async function () {
    base_url = $('body').attr('base-url');

    if ($('#isNews').val() !== undefined) {
        data = await getNews();

        var news = data.data;
        var count = data.count;

        maxPages = Math.ceil(count / 6)
        for (let i = maxPages; i > 0; i--) {
            var element = $('#template-paggination').clone()
            element.attr('id', 'page' + i);
            element.removeAttr('hidden')
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

        loadNews(news)
    }



    $('.delete-btn').click(function (event) {
        event.preventDefault();
        $('#confirm-modal').modal('show');
        var href = $(event.currentTarget).attr('href')

        $('#confirm-btn').attr('href', href);

    });
})

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
    var url = base_url + "/site/get-news?page=" + $('#page').val()
    await $.ajax({
        url: url,
        type: 'get',
        data: {
            //   searchname: $("#searchname").val() , 
            //   searchby:$("#searchby").val() , 
            _csrf: $('#csrf').val()
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
            console.log(element);
            
            var template = $('#news_template').clone();
            template.removeAttr('id');
            template.removeAttr('hidden');
            template.find('#news-title').text(element.title);
            template.find('#news-date').text(element.date);
            template.find('#news-content').text(element.content);
            template.find('#news-image').attr('src', base_url + '/' + (element.images[0] == null ? 'images/news.jpg' : element.images[0]));
            template.find('#news-edit').attr('href', base_url + '/site/view-news?id=' + element.id);
            $('#news-container').append(template);
        }
    }
}