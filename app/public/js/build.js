'use strict';

var ListApplication = React.createClass({
  displayName: 'ListApplication',

  page: 1,

  getInitialState: function getInitialState() {
    return {
      'list': []
    };
  },

  loading: false,

  getList: function getList() {
    var self = this;
    var httpRequest = new XMLHttpRequest();

    if (self.loading) return;

    httpRequest.onreadystatechange = function () {
      if (httpRequest.readyState == 4 && httpRequest.status == 200 && httpRequest.responseText) {
        try {

          var arr = self.state.list.concat(JSON.parse(httpRequest.responseText));
          self.setState({
            'list': arr
          });
          self.page += 1; // increment page
          self.loading = false;
        } catch (exception) {
          self.loading = false;
          console.log(exception);
        }
      }
    };

    self.loading = true;
    httpRequest.open('GET', this.props.source + '?page=' + this.page, true);
    httpRequest.send();
  },

  componentDidMount: function componentDidMount() {
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
      margin: '0'
    }
  },

  render: function render() {
    var self = this;

    return React.createElement(
      'div',
      null,
      ' ',
      this.state.list.map(function (article, index) {
        var src = 'http://cdn.skim.gs/image/upload/c_fill,dpr_1.0,w_200/' + article.image.id;
        return React.createElement(
          'article',
          { style: self.style.article },
          React.createElement(
            'div',
            { style: self.style.image },
            React.createElement(
              'a',
              { href: article.url },
              React.createElement('img', { src: src })
            )
          ),
          React.createElement(
            'div',
            { style: self.style.text },
            React.createElement(
              'a',
              { href: article.url, style: self.style.title },
              React.createElement('div', { dangerouslySetInnerHTML: { __html: article.title } })
            ),
            React.createElement(
              'div',
              { style: self.style.by },
              'by ',
              article.author.name
            )
          )
        );
      }),
      ' '
    );
  }
});

ReactDOM.render(React.createElement(ListApplication, { source: '/list/parenting' }), document.getElementById('new-list'));
'use strict';

var Message = React.createClass({
  displayName: 'Message',

  componentDidMount: function componentDidMount() {},

  getInitialState: function getInitialState() {
    return { items: this.props.items };
  },

  clicked: function clicked() {
    console.log('I feel much better, now.');
  },

  render: function render() {
    var self = this;

    return React.createElement(
      'span',
      null,
      React.createElement(
        'div',
        { onClick: this.clicked },
        'Just what do you think youre you doing ',
        this.props.title
      ),
      React.createElement(
        'div',
        null,
        this.state.items.map(function (item) {
          return React.createElement(
            'span',
            null,
            item
          );
        })
      )
    );
  }
});

ReactDOM.render(React.createElement(Message, { title: 'Dave' }), document.getElementById('message'));
'use strict';

var NavigationList = React.createClass({
  displayName: 'NavigationList',

  getInitialState: function getInitialState() {
    return {
      'links': ['one', 'two', 'three']
    };
  },

  render: function render() {
    return React.createElement(
      'ul',
      { style: this.props.style },
      ' ',
      this.state.links.map(function (link, index) {
        return React.createElement(
          'li',
          null,
          link
        );
      }),
      ' '
    );
  }
});

var Navigation = React.createClass({
  displayName: 'Navigation',

  getInitialState: function getInitialState() {
    return {
      display: 'none'
    };
  },

  componentDidMount: function componentDidMount() {},

  clickHeader: function clickHeader(event) {
    if (this.state.display === 'none') {
      this.setState({
        display: 'block'
      });
    } else {
      this.setState({
        display: 'none'
      });
    }
  },

  render: function render() {
    var self = this;

    return React.createElement(
      'span',
      null,
      React.createElement(
        'header',
        { onClick: this.clickHeader },
        'Sections'
      ),
      React.cloneElement(React.createElement(NavigationList, null), { style: { display: this.state.display } })
    );
  }
});

ReactDOM.render(React.createElement(Navigation, null), document.getElementById('navigation'));