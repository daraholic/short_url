# 短網址服務

此專案使用 Laravel 建立提供短網址的服務。以下為該服務提供之 API 功能描述：

1. 將長網址變成短網址
2. 可用短網址取得原長網址
3. 每個短網址只能被打開10次
4. 每次被打開需要在資料庫中記錄打開的時間及第幾次被打開

## 前置條件
- 需在本機下載 [Docker](https://docs.docker.com/get-docker/)
### 按照以下步驟在本機啟動專案
- 將專案拉至本機
```
git clone https://github.com/daraholic/short_url.git
```
- 目錄切至專案下
```
cd short_url
```
- 使用 docker compose 起服務
```
docker compose up -d --build
```
- 設置環境變量
將 .env.example 文件複製為 .env，並修改必要的環境變量。
```
cp .env.example .env
```
- 使用以下指令添加 .env 文件中的 APP_KEY：
```
php artisan key:generate
``` 
- 在本機開啟網頁輸入以下資訊會看到 Laravel 歡迎頁
```
localhost:8200
```
- 此服務提供兩支 API
1. 建立短網址
2. 取得長網址
將此專案之 api.yaml 檔案內容貼至 [swagger 線上編輯](https://editor.swagger.io/) 即可查看 API 文件詳細。

