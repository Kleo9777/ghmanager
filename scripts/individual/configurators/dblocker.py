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
parser.add_option("-m")

(options, args) = parser.parse_args(args=None, values=None)
serverPath = options.serverPath
addonPath = options.addonPath

serverCfg = serverPath + "/" + addonPath + "/cfg/server.cfg"

text = '''
// Включить античит DBlocker
db_active 1

// Включить анти-speedhack
db_anti_speedhack 1

// Включить анти-wallhack
db_anti_wallhack 0

// This cvar enables the cvar checking system
db_check_cvars 1

// Скрыть наличите DBLocker на сервере. Не показывать сообщения в чат и не отзываться на команды.
// Все сообщения и действия будут писаться в DBlocker.log
db_silent 0

// Показывать steamid подключающихся игроков в чат
db_show_steamid_on_connect 1
'''

addInfoToConfig(serverCfg, text)
