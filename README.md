# 短網址服務

此專案使用 Laravel 建立提供短網址的服務。以下為該服務提供之 API 功能描述：

1. 將長網址變成短網址
2. 可用短網址取得原長網址
3. 每個短網址只能被打開10次
4. 每次被打開需要在資料庫中記錄打開的時間及第幾次被打開

## 前置條件
- 需要在本機下載 Docker
### 按照以下步驟在本機啟動專案
```
git clone <repository-url>
cd short_url
```
- 設置環境變量
將 .env.example 文件複製為 .env，並修改必要的環境變量。
```
cp .env.example .env
```
- 使用以下指令更新 .env 文件中的 APP_KEY：
```
php artisan key:generate
``` 
- 使用 docker compose 起服務
```
docker compose up -d --build
```
- 開啟網頁輸入 localhost 會看到 Laravel 歡迎頁
