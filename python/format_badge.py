import codecs, string

infile = open("badge_info.txt")
infile.seek(0)
txt_list = infile.readlines()
infile.close()

txt_list = [line.decode("gbk") for line in txt_list]

#print txt_list
sec = ""
sub_sec = ""
count = 0

secfile = open("badge_sec_format.txt", "w")
subsecfile = open("badge_subsec_format.txt", "w")
infofile = open("badge_info_format.txt", "w")

for txt in txt_list:
    if '#' == txt[0]:
        sec = txt[1:-1].strip().split()[0]
        context = "%s" % (sec)
        secfile.write(context.encode("gbk")+'\n')
    elif '@' == txt[0]:
        count = 0
        sub_sec, total, need = txt[1:-1].strip().split()
        context = "%s#%s %s %s" % (sec, sub_sec, total, need)
        subsecfile.write(context.encode("gbk")+'\n')
    elif '1' == txt[0]:
        count = count + 1
        context = txt[1:-1].strip()
        context = "%s#%s#%s" % (sec, sub_sec, context)
        infofile.write(context.encode("gbk")+'\n')
        print "SCAN %s" % context        
    elif '0' == txt[0]:
        count = count + 1
        context = txt[1:-1].strip()
        context = "%s#%s#%s" % (sec, sub_sec, context)
        print "PASS %s" % context
    elif '\n' == txt[0]:
        pass
    else:
        print 'ERROR MSG: invalid input'

secfile.close()
subsecfile.close()
infofile.close()
