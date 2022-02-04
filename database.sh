docker run --name everydayhost \
             --env POSTGRES_USER=everyday \
             --env POSTGRES_PASSWORD=a1w2d3r4g5 \
             --env POSTGRES_DB=everydaydb \
             --publish 127.0.0.1:5432:5432 \
             --detach \
             --restart unless-stopped \
             postgres:latest
