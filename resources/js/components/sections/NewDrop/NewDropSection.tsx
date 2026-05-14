import React, { useState, useEffect } from 'react';
import Section from '../../ui/section/Section';
import styles from './NewDropSection.module.css';

const drops = [
    {
        id: 'hendrix-biker',
        name: 'Collar Biker Hendrix',
        image: '/images/hero/hendrix.png',
        link: '/products/hendrix-biker',
    },
    {
        id: 'midnight-denim',
        name: 'Collar Biker Scrambler',
        image: '/images/hero/scrambler.png',
        link: '/products/midnight-denim',
    },
];

export default function NewDropSection() {
    const [activeIndex, setActiveIndex] = useState(0); //

    useEffect(() => {
        const interval = setInterval(() => {
            setActiveIndex((prevIndex) =>
                prevIndex === drops.length - 1 ? 0 : prevIndex + 1,
            );
        }, 5000);

        return () => clearInterval(interval);
    }, []);

    return (
        <Section id="new-drops" fullWidth noPadding>
            <div className={styles.carouselFrame}>
                <div
                    className={styles.slide}
                    style={{
                        backgroundImage: `url(${drops[activeIndex].image})`,
                    }}
                >
                    <div className={styles.overlay}>
                        <div className={styles.titleBox}>
                            <h2 className={styles.sectionTitle}>NEW DROPS!</h2>
                        </div>
                        <div className={styles.dotContainer}>
                            {drops.map((_, index) => (
                                <button
                                    key={index}
                                    className={`${styles.dot} ${activeIndex === index ? styles.activeDot : ''}`}
                                    onClick={() => setActiveIndex(index)}
                                />
                            ))}
                        </div>
                        <div className={styles.productInfo}>
                            <h3 className={styles.productName}>
                                {drops[activeIndex].name}
                            </h3>
                            <a
                                href={drops[activeIndex].link}
                                className={styles.cta}
                            >
                                Check out now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </Section>
    );
}
