cd /usr/share/elasticsearch/config/sudachi
curl -H 'Content-Type: application/json' -X PUT 'http://localhost:9200/sudachi_test' -d@analysis_sudachi_settings.json
