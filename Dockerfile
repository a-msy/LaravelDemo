FROM docker.elastic.co/elasticsearch/elasticsearch:7.10.1

RUN elasticsearch-plugin install https://github.com/WorksApplications/elasticsearch-sudachi/releases/download/v2.1.0/analysis-sudachi-7.10.1-2.1.0.zip
RUN curl -Lo sudachi-dictionary-20201223-core.zip http://sudachi.s3-website-ap-northeast-1.amazonaws.com/sudachidict/sudachi-dictionary-20201223-core.zip
RUN unzip sudachi-dictionary-20201223-core.zip
RUN mkdir -p /usr/share/elasticsearch/config/sudachi/
RUN mv sudachi-dictionary-20201223/system_core.dic /usr/share/elasticsearch/config/sudachi/
RUN rm -rf sudachi-dictionary-20201223-core.zip sudachi-dictionary-20201223/
COPY sudachi.json  /usr/share/elasticsearch/config/sudachi/
COPY analysis_sudachi_settings.json  /usr/share/elasticsearch/config/sudachi/
COPY setup.sh /usr/share/elasticsearch/