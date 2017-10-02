https://slack.com/oauth/authorize?client_id=246279653974.250044667254&scope=client&redirect_uri=http://speakingrights.dev/foo/bar&state=&team=

http://speakingrights.dev/foo/bar?code=246279653974.248665901233.9db7db6707c4b08610c49f905961e392c12b672e1fdd104da3f66d84bb4d140d&state=

curl -X "POST" "https://slack.com/api/oauth.access?client_id=246279653974.250044667254&code=246279653974.248665901233.9db7db6707c4b08610c49f905961e392c12b672e1fdd104da3f66d84bb4d140d&client_secret=efed3eae8c832abcd44876e4c17644d3&redirect_uri=http:%2F%2Fspeakingrights.dev%2Ffoo%2Fbar"