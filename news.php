<?php
// Get news ID from URL
$news_id = isset($_GET['id']) ? $_GET['id'] : 1;

// Static news data
$news_articles = [
    1 => [
        'id' => 1,
        'title' => 'Champions League Final: Real Madrid vs Manchester City',
        'content' => '<p>The stage is set for an epic showdown between two European giants in the Champions League final. Real Madrid\'s experience against Manchester City\'s attacking prowess promises a thrilling match.</p>
        <p>Both teams have shown exceptional form throughout the tournament, with Real Madrid\'s dramatic comebacks and Manchester City\'s dominant performances. The final will be played at the iconic Wembley Stadium, adding another chapter to the rich history of this prestigious competition.</p>
        <p>Key players to watch include Vinicius Jr. for Real Madrid and Erling Haaland for Manchester City. The tactical battle between Carlo Ancelotti and Pep Guardiola will be fascinating to observe.</p>',
        'excerpt' => 'The stage is set for an epic showdown between two European giants in the Champions League final. Real Madrid\'s experience against Manchester City\'s attacking prowess promises a thrilling match.',
        'category' => 'Football',
        'image_url' => 'https://images.unsplash.com/photo-1522778119026-d647f0596c20?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80',
        'author_name' => 'John Doe',
        'author_image' => 'https://randomuser.me/api/portraits/men/1.jpg',
        'published_date' => '2024-05-15 10:00:00'
    ],
    2 => [
        'id' => 2,
        'title' => 'NBA Playoffs: Latest Updates and Predictions',
        'content' => '<p>As the NBA playoffs heat up, teams are giving their all to secure a spot in the finals. Expert analysis and predictions for the upcoming crucial matches.</p>
        <p>The Eastern Conference has seen surprising performances from underdog teams, while the Western Conference continues to showcase intense competition between traditional powerhouses.</p>
        <p>Key matchups to watch include the battle of the big men in the paint and the three-point shooting contests that could decide crucial games. Teams are adapting their strategies based on previous matchups, making each game a unique tactical challenge.</p>',
        'excerpt' => 'As the NBA playoffs heat up, teams are giving their all to secure a spot in the finals. Expert analysis and predictions for the upcoming crucial matches.',
        'category' => 'Basketball',
        'image_url' => 'https://images.unsplash.com/photo-1546519638-68e109498ffc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80',
        'author_name' => 'Jane Smith',
        'author_image' => 'https://randomuser.me/api/portraits/women/1.jpg',
        'published_date' => '2024-05-14 15:30:00'
    ],
    3 => [
        'id' => 3,
        'title' => 'Tennis Grand Slam: French Open Preview',
        'content' => '<p>The French Open is just around the corner, and tennis fans are eagerly awaiting. Top players prepare for the clay court challenge at Roland Garros.</p>
        <p>The tournament promises to be particularly exciting this year, with several players in peak form and the potential for new champions to emerge. The unique challenges of clay court tennis will test players\' endurance and tactical abilities.</p>
        <p>Key storylines include the return of former champions and the rise of young talents looking to make their mark on the sport\'s biggest stage.</p>',
        'excerpt' => 'The French Open is just around the corner, and tennis fans are eagerly awaiting. Top players prepare for the clay court challenge at Roland Garros.',
        'category' => 'Tennis',
        'image_url' => 'https://images.unsplash.com/photo-1599586120429-48281b6f0ece?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80',
        'author_name' => 'Mike Wilson',
        'author_image' => 'https://randomuser.me/api/portraits/men/2.jpg',
        'published_date' => '2024-05-13 09:15:00'
    ]
];

// Get the current article
$article = isset($news_articles[$news_id]) ? $news_articles[$news_id] : $news_articles[1];

// Get related news (same category, different ID)
$related_news = [];
foreach ($news_articles as $id => $news) {
    if ($news['category'] === $article['category'] && $id != $article['id']) {
        $related_news[] = $news;
    }
}

// If no related news, add some from other categories
if (empty($related_news)) {
    foreach ($news_articles as $id => $news) {
        if ($id != $article['id']) {
            $related_news[] = $news;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($article['title']); ?> - Sports News</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/news.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <style>
        .news-detail {
            padding: 80px 0;
            background-color: #fff;
        }

        .news-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .news-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .news-category {
            display: inline-block;
            background: var(--primary-color);
            color: #fff;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            margin-bottom: 15px;
        }

        .news-title {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 20px;
        }

        .news-meta {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            color: #666;
            font-size: 0.9rem;
        }

        .author {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .author img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .news-image {
            width: 100%;
            height: 500px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .news-content {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #444;
            margin-bottom: 50px;
        }

        .related-news {
            margin-top: 60px;
        }

        .related-news h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 30px;
        }

        .related-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .related-card {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .related-card:hover {
            transform: translateY(-5px);
        }

        .related-image {
            height: 200px;
            overflow: hidden;
        }

        .related-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .related-content {
            padding: 20px;
        }

        .related-content h3 {
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 10px;
        }

        .related-excerpt {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        @media (max-width: 768px) {
            .news-title {
                font-size: 2rem;
            }

            .news-image {
                height: 300px;
            }

            .news-content {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main>
        <section class="news-detail">
            <div class="news-container">
                <article>
                    <div class="news-header" data-aos="fade-up">
                        <span class="news-category"><?php echo htmlspecialchars($article['category']); ?></span>
                        <h1 class="news-title"><?php echo htmlspecialchars($article['title']); ?></h1>
                        <div class="news-meta">
                            <div class="author">
                                <img src="<?php echo htmlspecialchars($article['author_image']); ?>" alt="<?php echo htmlspecialchars($article['author_name']); ?>">
                                <span><?php echo htmlspecialchars($article['author_name']); ?></span>
                            </div>
                            <time><?php echo date('F j, Y', strtotime($article['published_date'])); ?></time>
                        </div>
                            </div>

                    <div class="news-image" data-aos="fade-up">
                        <img src="<?php echo htmlspecialchars($article['image_url']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
            </div>

                    <div class="news-content" data-aos="fade-up">
                        <?php echo $article['content']; ?>
                        </div>
                    </article>

                <section class="related-news" data-aos="fade-up">
                    <h2>Related News</h2>
                    <div class="related-grid">
                        <?php foreach ($related_news as $related): ?>
                        <article class="related-card">
                            <div class="related-image">
                                <img src="<?php echo htmlspecialchars($related['image_url']); ?>" alt="<?php echo htmlspecialchars($related['title']); ?>">
                            </div>
                            <div class="related-content">
                                <h3><?php echo htmlspecialchars($related['title']); ?></h3>
                                <p class="related-excerpt"><?php echo htmlspecialchars($related['excerpt']); ?></p>
                                <a href="news.php?id=<?php echo $related['id']; ?>" class="read-more">Read More</a>
                        </div>
                    </article>
                        <?php endforeach; ?>
            </div>
        </section>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });
    </script>
</body>
</html> 