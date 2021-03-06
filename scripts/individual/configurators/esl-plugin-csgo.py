#!/usr/bin/env python2
# coding: UTF-8

'''
***********************************************
Copyright (C) 2013 Nikita Bulaev

This library is free software; you can redistribute it and/or
modify it under the terms of the GNU Lesser General Public
License as published by the Free Software Foundation; either
version 2.1 of the License, or (at your option) any later version.

This library is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
Lesser General Public License for more details.
***********************************************
'''


print "Content-Type: text/html; charset=UTF-8"     # HTML is following
print                                              # blank line, end of headers

from optparse import OptionParser
from common import addInfoToConfig

parser = OptionParser()
parser.add_option("-s", "--server-path", action="store", type="string", dest="serverPath")
parser.add_option("-a", "--addon-path", action="store", type="string", dest="addonPath")
parser.add_option("-p")
parser.add_option("-g")
parser.add_option("-m", "--more", action="store", type="string", dest="more")

(options, args) = parser.parse_args(args=None, values=None)
serverPath = options.serverPath
addonPath = options.addonPath
port = options.more

tvPort = str(int(port) + 1015)

serverCfg = serverPath + "/" + addonPath + "/cfg/autoexec.cfg"

text = '''
// Отключить встроенный веб-сервер
// Пожалуйста, не включайте его без необходимости!
// Вы можете скачать демо через HTTP гораздо быстрее и удобнее
// Просто нажмите ссылку слева "Где находятся записанные демо?"
esl_webstop

// Порт для встроенного web-сервера ESL Plugin
// НЕ МЕНЯЙТЕ ЭТО ЗНАЧЕНИЕ!!! Не создавайте трудностей
// себе и другим клиентам!
// При инициализации порт вашего STV %s
// 0 означает, что будет использоваться текущий
// порт STV. НЕ МЕНЯЙТЕ ЭТО ЗНАЧЕНИЕ!!!
esl_webport 0

''' % tvPort

addInfoToConfig(serverCfg, text)

serverCfg = serverPath + "/" + addonPath + "/cfg/server.cfg"

text = '''
// Установка начальных параметров сервера по правилам ESL
exec "csgo_comp.cfg"

// Автоматическая запись демо через ESL Plugin
esl_autorecord 1
'''

addInfoToConfig(serverCfg, text)
