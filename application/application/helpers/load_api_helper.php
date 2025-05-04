<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('newsapi_apple')) {
    // Generates JavaScript code for exporting data to Excel
    function newsapi_apple($id)
    {
        return <<<HTML
        <script>
        var url = 'https://newsapi.org/v2/everything?' +
            'q=Apple&' +
            'sortBy=popularity&' +
            'apiKey=2ddeda26485b4851a6e60ad65e64fdba';

        var req = new Request(url);
        var articleLimit = 10; // Set the limit on the number of articles

        fetch(req)
            .then(function (response) {
            return response.json();
            })
            .then(function (data) {
            var newsContainer = document.getElementById('{$id}');
            if (data.articles && data.articles.length > 0) {
                var filteredArticles = data.articles.filter(function(article) {
                        return article.title !== '[Removed]';
                    });

                // Limit the number of articles to be displayed
                var limitedArticles = filteredArticles.slice(0, articleLimit);

                var articles = limitedArticles.map(function (article) {
                return '<div>' +
                    '<h2>' + article.title + '</h2>' +
                    '<p>' + article.description + '</p>' +
                    '<a href="' + article.url + '">Read more</a>' +
                    '</div>';
                }).join('');
                newsContainer.innerHTML = articles;
            } else {
                newsContainer.innerHTML = '<p>No news found.</p>';
            }
            })
            .catch(function (error) {
            console.log('Error:', error);
            });
        </script>
        HTML;
    }
}

