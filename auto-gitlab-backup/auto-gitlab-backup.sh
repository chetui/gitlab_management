#!/bin/bash


gitHome="$(awk -F: -v v="git" '{if ($1==v) print $6}' /etc/passwd)"
gitlabHome="/opt/gitlab-6.3.0-0/"
PDIR=$(dirname $(readlink -f $0))
confFile="$PDIR/auto-gitlab-backup.conf"

source $confFile

echo `du -hs "$gitlabHome"`
echo

cd $PDIR

echo -e "Start rsync to \n$remoteServer:$remoteDest\ndefault key"
$gitlabHome/ctlscript.sh stop
rsync -Cavz --delete-after -e "ssh -p$remotePort" $gitlabHome/ $remoteUser@$remoteServer:$remoteDest
$gitlabHome/ctlscript.sh start

exit 0
