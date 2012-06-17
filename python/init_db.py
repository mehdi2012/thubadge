#-*- encoding:utf-8 -*-
import MySQLdb, sys
import codecs, string

try:
    conn = MySQLdb.connect(
        host="localhost",
        user="root",
        passwd="",
        db="thubadge",
        charset="utf8") 
    
except MySQLdb.Error, e:
    print "error %d: %s" % (e.args[0], e.args[1])
    sys.exit(1)

infile = open("badge_info.txt")
infile.seek(0)
txt_list = infile.readlines()
infile.close()

txt_list = [line.decode("gbk") for line in txt_list]
    
with conn:
    cursor = conn.cursor()

    reload(sys)
    sys.setdefaultencoding('gb2312')
    
    #
    cursor.execute("CREATE TABLE IF NOT EXISTS \
        `badge_cate`(\
        `id` varchar(31) NOT NULL, \
        `title` varchar(255) DEFAULT NULL, \
        PRIMARY KEY (`id`))DEFAULT CHARSET=utf8;")

    sql = "insert into badge_cate(id, title) values(%s,%s)"     

    param = ("food", "饮食吃货")
    n = cursor.execute(sql,param)

    param = ("life", "生活常识")
    n = cursor.execute(sql,param)

    #
    cursor.execute("CREATE TABLE IF NOT EXISTS \
        `badge`(\
        `id` int(11) NOT NULL AUTO_INCREMENT, \
        `cate` varchar(31) NOT NULL, \
        `title` varchar(255) DEFAULT NULL, \
        `context` varchar(4000) DEFAULT NULL, \
        PRIMARY KEY (`id`))DEFAULT CHARSET=utf8;")

    # `image_str` varchar(255) DEFAULT NULL, \
    
    #add  
    sql = "insert into badge(cate, title, context) values(%s,%s,%s)"     
    param = ("food","我为锅狂","单次吃香锅消费在60元以上")      
    n = cursor.execute(sql,param)
    
    param = ("food","口福不浅","一星期内被人请客五次以上")      
    n = cursor.execute(sql,param)

    param = ("life","千金散尽","在学校丢失超过1000元现金")
    n = cursor.execute(sql,param)
        
    #update      
    #sql = "update user set name=%s where Id=9001"
    #param = ("ken")
    #n = cursor.execute(sql,param)      
    #print n      
      
    #query    
    #n = cursor.execute("select * from user")      
    #for row in cursor.fetchall():      
    #    for r in row:      
    #        print r,     
    #print ""  
      
      
    #delete     
    #sql = "delete from user where name=%s"     
    #param =("ted")      
    #n = cursor.execute(sql,param)      
    #print n      
    #cursor.close() 
