import React, { useEffect, useState } from 'react';
import axios from 'axios';

const ExamplePage = () => {
    const [data, setData] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    useEffect(() => {
        // Fetch data from Laravel API
        axios
            .get('http://127.0.0.1:8000/api/example-data') // Update with your API route
            .then((response) => {
                setData(response.data); // Update the state with the data
                setLoading(false);
            })
            .catch((error) => {
                console.error('Error fetching data:', error);
                setError('Failed to fetch data');
                setLoading(false);
            });
    }, []);

    if (loading) return <p>Loading...</p>;
    if (error) return <p>{error}</p>;

    return (
        <div style={{ padding: '20px' }}>
            <h1>Data Returned Susscessfully </h1>
            <ul>
                {data.map((item) => (
                    <li key={item.id}>{item.name}</li>
                ))}
            </ul>
        </div>
    );
};

export default ExamplePage;