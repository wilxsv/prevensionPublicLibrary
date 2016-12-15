#include "gui_utilities.h"
#include "homescreen.h"
#include "socketHandling.h"
#include "ui_homescreen.h"

#include <errno.h>
#include <stdio.h>
#include <sys/types.h>
#include <sys/stat.h>
#include <fcntl.h>
#include <unistd.h>
#include <stdlib.h>
#include <string.h>
#include <string>
#include <stdint.h>
#include <termios.h>

#include <QApplication>
#include <QTimer>
#include <QDebug>

using namespace GilsonEmbeddedApps;
//section 4,6
gui_utilities::gui_utilities()
{

}

gui_utilities::~gui_utilities(){
}

/*********************************************************************
 * Getters and Setters
 *********************************************************************/
double HomeScreen::getPumpStartTime() const
{
    return pumpStartupTime;
}

void HomeScreen::setPumpStarttime(double value)
{
    pumpStartupTime = value;
}

tInputSignalState HomeScreen::getRemoteInput4() const
{
    return remoteInput4;
}

void HomeScreen::setRemoteInput4(const tInputSignalState &value)
{
    remoteInput4 = value;
}

tInputSignalState HomeScreen::getRemoteInput3() const
{
    return remoteInput3;
}

void HomeScreen::setRemoteInput3(const tInputSignalState &value)
{
    remoteInput3 = value;
}

tInputSignalState HomeScreen::getRemoteInput2() const
{
    return remoteInput2;
}

void HomeScreen::setRemoteInput2(const tInputSignalState &value)
{
    remoteInput2 = value;
}

tInputSignalState HomeScreen::getRemoteInput1() const
{
    return remoteInput1;
}

void HomeScreen::setRemoteInput1(const tInputSignalState &value)
{
    remoteInput1 = value;
}

/*********************************************************************
 * Epic 0014 Logic
 *********************************************************************/
void HomeScreen::getInitialStateInputSignal(){
/*    if ( !this->gecpRecvObj->RSP.rspParams[pumpRunStatusRsp_RemoteSignal1].empty() )
        setRemoteInput1( atoi( (const char*)this->gecpRecvObj->RSP.rspParams[pumpRunStatusRsp_RemoteSignal1].c_str() ) );
    if ( !this->gecpRecvObj->RSP.rspParams[pumpRunStatusRsp_RemoteSignal2].empty() )
        setRemoteInput2( atoi( (const char*)this->gecpRecvObj->RSP.rspParams[pumpRunStatusRsp_RemoteSignal2].c_str() ) );
    if ( !this->gecpRecvObj->RSP.rspParams[pumpRunStatusRsp_RemoteSignal3].empty() )
        setRemoteInput3( atoi( (const char*)this->gecpRecvObj->RSP.rspParams[pumpRunStatusRsp_RemoteSignal3].c_str() ) );
    if ( !this->gecpRecvObj->RSP.rspParams[pumpRunStatusRsp_RemoteSignal4].empty() )
        setRemoteInput4( atoi( (const char*)this->gecpRecvObj->RSP.rspParams[pumpRunStatusRsp_RemoteSignal4].c_str() ) );*/
}
