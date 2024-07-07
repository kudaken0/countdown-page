<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カウントダウン</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            <?php if (isset($_GET['bg']) && $_GET['bg'] === 'true') echo 'background-color: rgba(0, 0, 0, 0.5);'; ?>
        }
        .countdown {
            text-align: center;
            color: white;
            <?php if (isset($_GET['bg']) && $_GET['bg'] === 'true') echo 'background-color: rgba(0, 0, 0, 0.5); padding: 20px; border-radius: 10px;'; ?>
        }
        .countdown h1 {
            font-size: 50px;
            margin: 0;
        }
        .countdown p {
            font-size: 24px;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="countdown">
        <h1 id="countdown"></h1>
    </div>
    <script>
        const endDate = new Date("<?php echo $_GET['date']; ?> <?php echo $_GET['time']; ?>").getTime();
        const countdownElement = document.getElementById('countdown');

        function updateCountdown() {
            const now = new Date().getTime();
            const distance = endDate - now;

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            countdownElement.innerHTML = `${days}日 ${hours}時間 ${minutes}分 ${seconds}秒`;

            if (distance < 0) {
                clearInterval(interval);
                countdownElement.innerHTML = "終了しました";
            }
        }

        const interval = setInterval(updateCountdown, 1000);
    </script>
</body>
</html>
