/**
 * Created by okryshch on 12/11/15.
 */
var TRADESYHOMETEST = TRADESYHOMETEST || {};

(function(o){
    var Pagination = React.createClass({
        render: function() {
            return (
                <nav>
                    <ul className="pager">
                        <li className="previous disabled"><a href="#"><span aria-hidden="true">&larr;</span> Previous</a></li>
                        <li className="next"><a href="#">Next <span aria-hidden="true">&rarr;</span></a></li>
                    </ul>
                </nav>
            );
        }
    });

    var Item = React.createClass({
        render: function() {
            return (
                <div className="col-sm-6 col-md-4" key={this.props.key}>
                    <div className="thumbnail">
                        <img src={this.props.image} alt={this.props.title}/>
                        <div className="caption">
                            <h3>{this.props.title}</h3>
                            <p>{this.props.desc}</p>
                            <p className="price-point">{this.props.price}</p>
                            <p><a href={this.props.more_link} className="btn btn-default" role="button">View More</a></p>
                        </div>
                    </div>
                </div>
            );
        }
    });

    var ItemsList = React.createClass({
        getInitialState: function() {
            return {data: []};
        },
        componentDidMount: function() {
            $.ajax({
                url: this.props.url,
                dataType: 'json',
                cache: false,
                success: function(data) {
                    this.setState({data: data.items});
                }.bind(this),
                error: function(xhr, status, err) {
                    console.error(this.props.url, status, err.toString());
                }.bind(this)
            });
        },
        render: function() {
            var items = this.state.data.map(function(item) {
                return (
                    <Item image={item.image} title={item.title} desc={item.desc} more_link={item.more_link} price={item.price} key={item.id}/>
                );
            });
            return (
                <div className="row">
                    {items}
                </div>
            );
        }
    });

    ReactDOM.render(
        <Pagination />,
        document.getElementById('grid-view-pagination')
    );

    ReactDOM.render(
        <ItemsList url="/json_response.json"/>,
        document.getElementById('content')
    )

})(TRADESYHOMETEST);
