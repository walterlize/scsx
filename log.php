2015.09.12
1.! controllers > admin >imgnews > imgList(); ====>修改$array，改正不同系管理员会看到全部实习风采的错误
2.  models > m_news > getNewss($array, $per_page, $offset) ====>删除按作者id排序
3.  models > m_nvariable > zhandi_iconv($param,$currCharset,$toCharset) ====>加@隐藏错误······