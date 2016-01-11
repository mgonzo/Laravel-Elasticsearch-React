var Message = React.createClass({

  getInitialState: function () {
    return {
      title: ''
    };
  },

  componentDidMount: function () {
  },

  clicked: function (e){
    console.log(e.target);
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
