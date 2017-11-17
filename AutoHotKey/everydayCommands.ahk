#NoEnv  ; Recommended for performance and compatibility with future AutoHotkey releases.
; #Warn  ; Enable warnings to assist with detecting common errors.
SendMode Input  ; Recommended for new scripts due to its superior speed and reliability.
SetWorkingDir %A_ScriptDir%  ; Ensures a consistent starting directory.
;-------------------
;#->windows
;!->Alt
;^->Ctr
;+->Shift
;&->combine keys
;-------------------

;alt+tab
f1::
    Send {Alt Down}{Tab}
    Sleep 100
    Send {Alt Up}
    return


;Go to the right desktop
f3::
    SendInput #^{Left}
    return

;go to the left desktop
f4::
    SendInput #^{Right}
    return

;Open New Tab
f7::
    SendInput ^{t}
    return

;play/pause Music
f8::
    Send {Media_Play_Pause}
    return

;Switch to previous song
f9::
    Send {Media_Prev}
    return

;Switch to next song
f10::
    Send {Media_Next}
    return

;Volume down
f11::
    Send {Volume_Down 1}
    return

;Volume up
f12::
    Send {Volume_Up 1}
    return

;Go to left desktop by swiping left the touchpad(should assign it to Browser Back in registry editor)
Browser_Back::
    SendInput #^{Right}
    return

;Go to right desktop by swiping left the touchpad(should assign it to Browser Forward in registry editor)
Browser_Forward::
    SendInput #^{Left}
    return

;Go to previous page on Chrome
RAlt::
    Send !{Left}
    return

;Go to left tab on Chrome
>^Left::
    Send ^+{Tab}
    return

;Go to right tab on Chrome
>^Right::
    Send ^{Tab}
    return

;Select the previous word in current text
Ins::
    Send ^+{Left}

;Now the stupid stuff

;Write Laugh Emoji
+l::
Send, 😂
return

;Write Whatever Face
+k::
Send, ¯\_(ツ)_/¯
return

;Write lemmy Face
+j::
Send,  ( ͡° ͜ʖ ͡°) 
return