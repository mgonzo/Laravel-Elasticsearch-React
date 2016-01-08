var Message = React.createClass({

  componentDidMount: function () {
  },

  clicked: function (){
    console.log('I feel much better, now.');
  },

  render: function() {
    var self = this;

    return (
        <div onClick={this.clicked}>
          Just what do you think youre you doing {this.props.title}
        </div>
    );
  }
});

ReactDOM.render(
    <Message title="Dave"/>,
    document.getElementById('message')
);
