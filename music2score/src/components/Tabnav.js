// Imports.
import React from 'react';

class Tabnav extends React.Component {

    constructor(props) {
        super(props);

        this.tabStyle = {display: 'flex', 
                        flexDirection: 'row', 
                        justifyContent: 'center', 
                        cursor: 'pointer',
                    }
    }
    render() {
        return (
            <div style={this.tabStyle}>
                <ul className='nav nav-tabs'>
                    {
                        this.props.tabs.map(tab => {
                            const active = (tab === this.props.selected ? 'active' : '');
                        
                            return (
                                <li className='nav-item' key={tab} style={{width: '267px'}}>
                                    <a className={'nav-link' + active} 
                                    onClick={() => this.props.setSelected(tab)}>
                                        {tab}
                                    </a>
                                </li>
                            );
                        })
                    }
                </ul>
                {this.props.children}
            </div>
        );
    }
}

export default Tabnav;
