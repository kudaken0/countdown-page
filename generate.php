<?php
// エラーレポートを有効にする
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $endDate = $_POST['endDate'];
    $endTime = $_POST['endTime'];
    $background = isset($_POST['background']) && $_POST['background'] === 'true' ? 'true' : 'false';

    // ランダムな英数字5桁を生成し、重複しないことを確認
    $codesFile = 'codes.txt';
    
    // ファイルが存在しない場合に備えて
    if (!file_exists($codesFile)) {
        file_put_contents($codesFile, '');
    }

    $existingCodes = file($codesFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    do {
        $randomString = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 5);
    } while (in_array($randomString, $existingCodes));

    // 新しいコードをファイルに追加
    file_put_contents($codesFile, $randomString . PHP_EOL, FILE_APPEND);

    $url = 'http://tool.kudaken.com/countdown/make/countdown.php?code=' . $randomString . '&date=' . $endDate . '&time=' . $endTime . '&bg=' . $background;
    echo json_encode(['url' => $url]);
}
?>
