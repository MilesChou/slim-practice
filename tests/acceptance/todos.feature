Feature: 會說你好的網頁
  Scenario: 看網頁說你好
    Given 開啟伺服器
    When 開啟網頁丟 "Miles" 進去
    Then 會看到 "Hello, Miles"
