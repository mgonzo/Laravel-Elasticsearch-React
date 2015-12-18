var ListApplication = React.createClass({

  page: 1,

  getInitialState: function () {
    return {
      'list': []
    }
  },

  loading: false,

  getList: function () {
    var self = this;
    var httpRequest = new XMLHttpRequest();

    if (self.loading) return;

    httpRequest.onreadystatechange = function () {
      if (httpRequest.readyState == 4 && 
          httpRequest.status == 200 && 
          httpRequest.responseText) {
        try {

          var arr = self.state.list.concat(JSON.parse(httpRequest.responseText));
          self.setState({
            'list': arr
          });
          self.page += 1; // increment page
          self.loading = false;

        } catch(exception) {
          self.loading = false;
          console.log(exception);
        }
      }
    };

    self.loading = true;
    httpRequest.open('GET', this.props.source + '?page=' + this.page, true);
    httpRequest.send();
  },

  componentDidMount: function () {
    var self = this;
    this.getList();

    window.addEventListener('scroll', function (event) {
      var el = document.getElementById('new-list');
      var children = el.children.item(0).children;
      var last = children.item(children.length - 1);
      if (!last) return;
      var diff = last.offsetTop - (window.scrollY + window.outerHeight);
      if (diff <= 0) {
        self.getList();
      }
    });
  },

  style: {
    article: {
      borderStyle: 'none none solid none',
      borderWidth: '1px',
      borderColor: '#c0c3c4',
      position: 'relative',
      width: '100%'
    },
    image: {
      display: 'table-cell',
      paddingTop: '.5em',
      width: '25%'
    },
    text: {
      display: 'table-cell',
      paddingTop: '.5em',
      paddingLeft: '.5em',
      verticalAlign: 'top',
      width: '75%'
    },
    title: {
      display: 'block',
      fontSize: '1.1em',
      margin: '0',
      textDecoration: 'none'
    },
    by: {
      color: '#666',
      fontSize: '.9em',
      fontWeight: '400',
      lineHeight: '2em',
      margin: '0',
    },
  },

  render: function() {
    var self = this;

    return (
        <div> { 
          this.state.list.map(function (article, index) {
            var src = 'http://cdn.skim.gs/image/upload/c_fill,dpr_1.0,w_200/' + article.image.id;
            return (
              <article style={self.style.article}> 
                <div style={self.style.image}>
                  <a href={article.url}><img src={src}></img></a>
                </div>
                <div style={self.style.text}>
                  <a href={article.url} style={self.style.title}>
                    <div dangerouslySetInnerHTML={{__html: article.title}} />
                  </a>
                  <div style={self.style.by}>by {article.author.name}</div>
                </div>
              </article>
            );
          }) 
        } </div>
    );
  }
});

ReactDOM.render(
    <ListApplication source="/list/parenting"/>, 
    document.getElementById('new-list')
);
